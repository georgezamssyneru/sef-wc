import React from 'react';
import FileUploader from 'devextreme-react/file-uploader';
import ProgressBar from 'devextreme-react/progress-bar';

/**
 * REPORT COMPONENT
 * @param props
 * @returns {*}
 * @constructor
 */
export function FormDashboardImage(props) {

    const [typeSubmit, setTypeSubmit] = React.useState();

    const [isDropZoneActive, setIsDropZoneActive] = React.useState(false);

    const [imageSource, setImageSource] = React.useState('');

    const [textVisible, setTextVisible] = React.useState(true);

    const [progressVisible, setProgressVisible] = React.useState(false);

    const [progressValue, setProgressValue] = React.useState(0);

    const [allowedFileExtensions, setAllowedFileExtensions] = React.useState(['.jpg', '.jpeg', '.gif', '.png']);

    React.useEffect(() => {

    }, []);

    /**
     *
     * @param f
     * @param type
     */
    const createBase64 = (file, cb) => {

        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            cb(reader.result)
        };
        reader.onerror = function (error) {
            console.log('Error: ', error);
        };

    };

    /**
     *
     * @param e
     */
    const onDropZoneEnter = (e) => {
        if (e.dropZoneElement.id === 'dropzone-external') {

            setIsDropZoneActive(true);

        }
    };

    /**
     *
     * @param e
     */
    const onDropZoneLeave = (e) => {
        if (e.dropZoneElement.id === 'dropzone-external') {
            this.setState({ isDropZoneActive: false });
        }
    }

    /**
     *
     * @param e
     */
    const onUploaded = (e) => {
        const { file } = e;
        const fileReader = new FileReader();
        fileReader.onload = () => {

            setIsDropZoneActive(false);
            setImageSource(fileReader.result);

        };
        fileReader.readAsDataURL(file);

        setTextVisible(false);
        setProgressValue(0);
        setProgressVisible(false);

        props.uploadedCompleted();

    };

    /**
     *
     * @param e
     */
    const onProgress = (e) =>  {

        setProgressValue((e.bytesLoaded / e.bytesTotal) * 100);

    };

    const onUploadStarted = () => {

        setImageSource('');
        setProgressVisible( true );

    };

    const onBeforeSend = (e) => {

        let token = JSON.parse(localStorage.getItem('auth'));
        let getAccessToken = token['access_token'];

        e.request.setRequestHeader ( 'Authorization', `Bearer ${getAccessToken}` );

    }

    return (

        <React.Fragment>

            <div className="widget-container flex-box">
                <span>Place the dashboard image:</span>
                <div id="dropzone-external" className={`flex-box ${isDropZoneActive ? 'dx-theme-accent-as-border-color dropzone-active' : 'dx-theme-border-color'}`}>
                    {imageSource && <img id="dropzone-image" src={imageSource} alt="" />}
                    {textVisible
                    && <div id="dropzone-text" className="flex-box">
                        <span>Drag & Drop the desired file</span>
                        <span>…or click to browse for a file instead.</span>
                    </div>}
                    <ProgressBar
                        id="upload-progress"
                        min={0}
                        max={100}
                        width="30%"
                        showStatus={false}
                        visible={progressVisible}
                        value={progressValue}
                    ></ProgressBar>
                </div>
                <FileUploader
                    id="file-uploader"
                    dialogTrigger="#dropzone-external"
                    dropZone="#dropzone-external"
                    multiple={false}
                    allowedFileExtensions={allowedFileExtensions}
                    uploadMode="instantly"
                    uploadUrl={`${process.env.REACT_APP_BACKEND_URL}/uploadDashboardImage?dashboard_id=` + props.selectedData.data.dashboard_id }
                    visible={false}
                    //uploadMethod={'PUT'}
                    onDropZoneEnter={onDropZoneEnter}
                    onDropZoneLeave={onDropZoneLeave}
                    onUploaded={onUploaded}
                    onProgress={onProgress}
                    onUploadStarted={onUploadStarted}
                    onBeforeSend={onBeforeSend}
                ></FileUploader>
            </div>

        </React.Fragment>

    );

}
